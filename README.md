# SERVICE_PUSTIKOM
 
+--------+--------------------------+------------+---------------------------------------------------+--------+------------+
| Verb   | Path                     | NamedRoute | Controller                                        | Action | Middleware |
+--------+--------------------------+------------+---------------------------------------------------+--------+------------+
| GET    | /pmb/biodata/all         |            | App\Http\Controllers\pmb\BiodataController        | all    |            |
| POST   | /pmb/biodata/store       |            | App\Http\Controllers\pmb\BiodataController        | store  |            |
| GET    | /pmb/biodata/{id}/show   |            | App\Http\Controllers\pmb\BiodataController        | show   |            |
| PATCH  | /pmb/biodata/{id}/update |            | App\Http\Controllers\pmb\BiodataController        | update |            |
| DELETE | /pmb/biodata/{id}/delete |            | App\Http\Controllers\pmb\BiodataController        | delete |            |
| GET    | /pmb/token/all           |            | App\Http\Controllers\pmb\TokenController          | all    |            |
| POST   | /pmb/token/store         |            | App\Http\Controllers\pmb\TokenController          | store  |            |
| GET    | /pmb/token/{id}/show     |            | App\Http\Controllers\pmb\TokenController          | show   |            |
| PATCH  | /pmb/token/{id}/update   |            | App\Http\Controllers\pmb\TokenController          | update |            |
| DELETE | /pmb/token/{id}/delete   |            | App\Http\Controllers\pmb\TokenController          | delete |            |
| GET    | /pmb/maba/all            |            | App\Http\Controllers\pmb\CalonMahasiswaController | all    |            |
| POST   | /pmb/maba/store          |            | App\Http\Controllers\pmb\CalonMahasiswaController | store  |            |
| GET    | /pmb/maba/{id}/show      |            | App\Http\Controllers\pmb\CalonMahasiswaController | show   |            |
| PATCH  | /pmb/maba/{id}/update    |            | App\Http\Controllers\pmb\CalonMahasiswaController | update |            |
| DELETE | /pmb/maba/{id}/delete    |            | App\Http\Controllers\pmb\CalonMahasiswaController | delete |            |
+--------+--------------------------+------------+---------------------------------------------------+--------+------------+