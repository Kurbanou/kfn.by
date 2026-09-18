# uploads

## для синхронизации с git

```php
// functions.php
- Перенаправить uploads в папку темы: themes/custom/assets/uploads/
- Все загрузки из медиатеки попадают в Git вместе с темой.
  \*/
  add_filter( 'upload_dir', 'wg_custom_upload_dir' );
  function wg_custom_upload_dir( $uploads ) {
  $uploads['basedir'] = WG_DIR . '/assets/uploads';
  $uploads['baseurl'] = WG_URI . '/assets/uploads';

      if ( ! empty( $uploads['subdir'] ) ) {
          $uploads['path'] = $uploads['basedir'] . $uploads['subdir'];
          $uploads['url']  = $uploads['baseurl'] . $uploads['subdir'];
      } else {
          $uploads['path'] = $uploads['basedir'];
          $uploads['url']  = $uploads['baseurl'];
      }

      return $uploads;

  }
```
