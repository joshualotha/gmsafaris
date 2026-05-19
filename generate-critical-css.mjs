import { generate } from 'critical';
import { writeFileSync } from 'fs';

try {
  const result = await generate({
    src: 'https://www.gmsafaris.co.tz/',
    css: ['css/purged/bootstrap.min.css', 'css/purged/style.min.css'],
    width: 430,
    height: 932,
    inline: false,
    penthouse: {
      timeout: 60000,
    }
  });

  console.log('Critical CSS generated:', result.css.length, 'bytes');
  writeFileSync('css/purged/critical.css', result.css);
  console.log('✓ Written to css/purged/critical.css');
} catch (err) {
  console.error('Critical error:', err.message);
  process.exit(1);
}
