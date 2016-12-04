## About

This is the tboox web tree. It provides a web api for usage inside the tboox Android app.

## API

#### BOOK

###### GET /api/book
* Receive the index of all books that may be filtered by the GET parameter 'filter'

###### GET /api/book/\{uuid}
* Show information on an uuid specifiable book

#### COLLECTION

###### DELETE /api/collection/\{uuid}
* Destroy an uuid specifiable item from the user collection

###### GET /api/collection
* Receive the index of all items in the user collection that may be filtered by the GET parameter 'filter'

###### POST /api/collection
* Store a new item in the user collection using the POST parameter 'object'

#### REVIEW

###### DELETE /api/review/\{uuid}
* Destroy an uuid specifiable review

###### GET /api/review
* Receive the index of all reviews that may be filtered by the GET parameter 'filter'

###### GET /api/review/\{uuid}
* Show information on an uuid specifiable review

###### POST /api/review
* Store a new review of a specific book using the POST parameter 'object'

#### USER

###### GET /api/user/timeline
* Receive the index of the user timeline that may be filtered by the GET parameter 'filter'

###### GET /api/user/\{uuid}/subscribe
* User A subscribe to an uuid specifiable user B, so that his reviews appears in user A timeline

###### GET /api/user/\{uuid}/unsubscribe
* Unsubscribe from an uuid specifiable user.

###### POST /api/user/login
* Logs the user in the api middleware using the POST parameter 'object'

## License

The tboox web api is open-sourced software licensed under the [GPLv2 license](https://www.gnu.org/licenses/gpl-2.0.html)
