# E-Pharmacy — Quick Start & Developer Guide

A small PHP + MySQL pharmacy management web app (frontend: Bootstrap, jQuery, Chart libraries). This README helps you install, run, and extend the project.

## Preview
Open the app in your browser after setup:
- [index.php](index.php) — main entry / login
- [home.php](home.php) — dashboard

## Requirements
- PHP (>= 7 recommended)
- MySQL / MariaDB
- XAMPP or similar LAMP stack
- Browser with JavaScript enabled

## Installation (quick)
1. Place project in your web root (example path used in this workspace):
   /Applications/XAMPP/xamppfiles/htdocs/5th-sem-minor-project/Pharmacy
2. Import the database:
   - [pharmacy.sql](pharmacy.sql)
3. Start Apache + MySQL (e.g. via XAMPP).
4. Open: http://localhost/Pharmacy/[index.php](index.php)

## Important files (what to look at)
- PHP pages
  - [index.php](index.php) — entry/login page
  - [home.php](home.php) — dashboard and charts
  - [stock.php](stock.php) — upload stock Excel (handles import)
  - [vstock.php](vstock.php) — view stock UI
  - [sale.php](sale.php) — sales page
  - [viewsale.php](viewsale.php) — view sales
- DB
  - [pharmacy.sql](pharmacy.sql) — sample schema + seed data
- Excel import
  - [SimpleXLSX.php](SimpleXLSX.php) — Excel parser used by [stock.php](stock.php). See [`SimpleXLS::parse`](SimpleXLSX.php).
- JS & CSS
  - [css/style.css](css/style.css) — main styles
  - [css/bootstrap.css](css/bootstrap.css) — bootstrap
  - [js/scripts.js](js/scripts.js) — custom site scripts
  - [js/skycons.js](js/skycons.js) — weather icons used on dashboard
  - [js/jquery.magnific-popup.js](js/jquery.magnific-popup.js) — lightbox
  - [dataTable_ini.js](dataTable_ini.js) — DataTable initialization (see [`$('#view').DataTable`](dataTable_ini.js))

## How to import stock (CSV / XLSX)
1. Visit [stock.php](stock.php).
2. Select the Excel/XLSX file and submit.
3. The page uses [SimpleXLSX.php](SimpleXLSX.php) (callsites: `SimpleXLS::parse`) to read rows and insert into DB.
4. If upload fails, ensure PHP `file_uploads` enabled and proper write permissions.

## Database connection
Default credentials are in pages like [stock.php](stock.php) — update to match your environment:
- host: `localhost`
- user: `root`
- password: `""` (empty)
- database: `pharmacy`

Adjust queries or connection code if you use different credentials.

## Common tasks
- Enable/adjust DataTables: edit [dataTable_ini.js](dataTable_ini.js).
- Update styles: [css/style.css](css/style.css).
- Add JS behavior: [js/scripts.js](js/scripts.js).

## Troubleshooting
- Blank pages / errors: enable PHP error display or check Apache error log.
- Upload permissions: ensure Apache user can write to upload temp and project folders.
- Database errors: confirm `pharmacy` DB exists and was imported from [pharmacy.sql](pharmacy.sql).

## Contributing
- Fork and submit patches.
- Keep frontend resources (CSS/JS) organized under `css/` and `js/`.
- Follow existing code style in PHP files.

## License & Attributions
- UI template originally from W3layouts (see header comments in PHP/CSS files).
- [SimpleXLSX.php](SimpleXLSX.php) bundled for Excel parsing.
