# Join Safari — Simplify Vehicles to Manual Status Labels

## Goal

Strip out all the auto-evaluation complexity from the vehicle system. Vehicles become simple status labels the admin manages manually. No automated confirm/cancel, no distribution math, no cancellation emails.

## What Changes (6 files, 1 deletion)

---

### 1. [`app/Models/JoinSafari.php`](app/Models/JoinSafari.php) — Remove `computeVehicleDistribution()`

Delete lines 126–143 (the entire `computeVehicleDistribution()` method).

The `spots_filled`, `spots_remaining`, and `is_joinable` accessors don't depend on distribution — they work directly from participants and vehicle capacity. Nothing else to change in this file.

---

### 2. [`app/Models/JoinSafariVehicle.php`](app/Models/JoinSafariVehicle.php) — Remove distribution-dependent accessors

Delete these accessors:
- `getSeatsFilledAttribute()` (lines 37–43) — depends on `computeVehicleDistribution()`
- `getSeatsAvailableAttribute()` (lines 45–48) — depends on `seats_filled`
- `getIsFullAttribute()` (lines 50–53) — depends on `seats_available`
- `getMeetsMinimumAttribute()` (lines 55–58) — depends on `seats_filled`

Keep:
- `$fillable`, `$casts`
- `joinSafari()` relationship
- `scopeOpen()`, `scopeConfirmed()`

The model becomes a thin wrapper: belongs to a join safari, has a vehicle number, capacity, min_required, and status.

---

### 3. [`app/Http/Controllers/Admin/JoinSafariController.php`](app/Http/Controllers/Admin/JoinSafariController.php) — Replace complex methods with simple status update

**Remove:**
- `checkVehicles()` method (lines 184–252) — ~70 lines of auto-evaluation logic
- `cancelVehicle()` method (lines 258–287) — ~30 lines of cancellation + email logic
- `use Mail` import if no longer used (check: `use Illuminate\Support\Facades\Mail;` on line 10 — remove if `cancelVehicle` was the only consumer)

**Add (simple, ~12 lines):**
```php
/**
 * Update a vehicle's status manually.
 */
public function updateVehicleStatus(Request $request, JoinSafariVehicle $vehicle)
{
    $validated = $request->validate([
        'status' => 'required|in:open,confirmed,cancelled',
    ]);

    $vehicle->update($validated);

    return back()->with('success', 'Vehicle #' . $vehicle->vehicle_number . ' status updated to ' . $validated['status'] . '.');
}
```

---

### 4. [`routes/admin.php`](routes/admin.php) — Swap vehicle routes

**Remove (lines 83–85):**
```php
// Join Safari Vehicle Management
Route::patch('/join-safaris/{joinSafari}/check-vehicles', [JoinSafariController::class, 'checkVehicles'])->name('join-safaris.check-vehicles');
Route::patch('/join-safari-vehicles/{vehicle}/cancel', [JoinSafariController::class, 'cancelVehicle'])->name('join-safari-vehicles.cancel');
```

**Add:**
```php
// Update vehicle status
Route::patch('/join-safari-vehicles/{vehicle}/status', [JoinSafariController::class, 'updateVehicleStatus'])->name('join-safari-vehicles.update-status');
```

---

### 5. [`resources/views/admin/join-safaris/show.blade.php`](resources/views/admin/join-safaris/show.blade.php) — Simplify vehicle table

**Lines 142–230 — Replace the entire Vehicles Section with a simpler version:**

Before (complex):
- "Check Vehicles" button with auto-evaluation
- Per-vehicle cancel buttons
- Progress bars with computed percentages
- Seats filled column (depends on distribution)
- `meets_minimum` checkmark badge

After (simple):
- No "Check Vehicles" button
- Per-vehicle **status dropdown form** (admin manually picks open/confirmed/cancelled)
- Vehicle #, Capacity, Min Required columns only
- No progress bars, no seats filled
- No cancel buttons

New vehicle table:
```blade
<!-- Vehicles Section -->
<div class="table-container mb-4">
    <div class="table-header">
        <h5><i class="fas fa-car me-2 text-primary"></i>Vehicles ({{ $joinSafari->vehicles->count() }})</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Vehicle #</th>
                    <th>Status</th>
                    <th>Capacity</th>
                    <th>Min Required</th>
                </tr>
            </thead>
            <tbody>
                @forelse($joinSafari->vehicles as $vehicle)
                    <tr>
                        <td><strong>Vehicle #{{ $vehicle->vehicle_number }}</strong></td>
                        <td>
                            <form action="{{ route('admin.join-safari-vehicles.update-status', $vehicle) }}" method="POST" class="d-flex gap-2 align-items-center">
                                @csrf @method('PATCH')
                                <select name="status" class="form-select form-select-sm" style="width: auto;">
                                    <option value="open" @selected($vehicle->status === 'open')>Open</option>
                                    <option value="confirmed" @selected($vehicle->status === 'confirmed')>Confirmed</option>
                                    <option value="cancelled" @selected($vehicle->status === 'cancelled')>Cancelled</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-outline-secondary">Update</button>
                            </form>
                        </td>
                        <td>{{ $vehicle->capacity }}</td>
                        <td>{{ $vehicle->min_required }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-3 text-muted">
                            <i class="fas fa-car fa-2x mb-2 d-block"></i>
                            No vehicles created yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
```

---

### 6. [`resources/views/emails/join-safari/vehicle-cancelled.blade.php`](resources/views/emails/join-safari/vehicle-cancelled.blade.php) — Delete file

This email template was only used by `cancelVehicle()`, which is being removed. Delete the entire file.

If the `emails/join-safari/` directory becomes empty, delete it too.

---

### 7. [`.seo-audit-log.md`](.seo-audit-log.md) — Log the simplification

Append entry documenting what was removed and why.

---

## What Stays Unchanged (Not Touched)

| File | Reason |
|------|--------|
| [`app/Http/Controllers/JoinSafariController.php`](app/Http/Controllers/JoinSafariController.php) (public) | Auto-expand on join still works — no changes needed |
| [`resources/views/join-safari/show.blade.php`](resources/views/join-safari/show.blade.php) (public) | Already simplified — shows vehicle #, status badge, "Min X to confirm" only |
| [`resources/views/join-safari/index.blade.php`](resources/views/join-safari/index.blade.php) (public) | Already simplified — shows "Unlimited capacity" |
| [`database/migrations/`](database/migrations/) | Both vehicle migrations stay (table is still used) |
| [`JoinSafariVehicle`](app/Models/JoinSafariVehicle.php) model file | Stays, just slimmed down |
| Admin `store()` auto-creates Vehicle #1 | Stays |
| Public `join()` auto-expands vehicles | Stays |

---

## Summary

```
REMOVED:
  checkVehicles()          ~70 lines of auto-evaluation
  cancelVehicle()          ~30 lines of cancellation + emails
  computeVehicleDistribution()  ~18 lines of math
  4 vehicle accessors      ~22 lines (seats_filled, seats_available, is_full, meets_minimum)
  2 routes                 check-vehicles, cancel vehicle
  1 email template         vehicle-cancelled.blade.php
  "Check Vehicles" button  admin show page
  Cancel buttons           per-vehicle in admin table
  Progress bars            admin vehicle table
  Seats filled column      admin vehicle table

ADDED:
  updateVehicleStatus()    ~12 lines — simple status dropdown
  1 route                  join-safari-vehicles.update-status
  Per-vehicle dropdown     admin show page

NET: ~130 lines removed, ~12 lines added = much simpler to maintain
```

## After This Change — Admin Workflow

1. Admin creates join safari → Vehicle #1 auto-created (open)
2. Customers join → more vehicles auto-created as needed
3. Admin opens show page → sees vehicle list with status dropdowns
4. **Admin manually decides**: "Vehicle #1 has enough people → set to confirmed"
5. **Admin manually decides**: "Vehicle #3 only has 1 person → set to cancelled"
6. Admin manually sets overall safari status at the top

No automated decisions. Admin has full control. Simple.
