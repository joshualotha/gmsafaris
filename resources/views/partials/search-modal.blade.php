<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Search Golden Memories Safaris</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <form action="{{ route('safaris') }}" method="GET" class="w-75 mx-auto d-flex" role="search">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control bg-transparent p-3"
                            placeholder="Search safaris, destinations, or experiences..."
                            aria-label="Search our website" required>
                        <button type="submit" class="input-group-text p-3" id="search-icon-1" aria-label="Submit search">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->
