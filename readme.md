## About tboox

This is the tboox web tree. It provides a web api for usage inside the tboox Android app.

## API

- GET /api/book
Receive the index of all books that may be filtered by the GET parameter 'filter'
- GET /api/book/{uuid}
Show information on a specific book

- GET /api/collection
Receive the index of all items in the user collection
- POST /api/collection
Store a new item in the user collection using the POST parameter 'collection'
- DELETE /api/collection/{uuid}
Destroy an item from the user collection

- GET /api/review
Receive the index of all reviews that may be filtered by the GET parameter 'filter'
- GET /api/review/{uuid}
Show information on a specific review
- POST /api/review
Store a new review of a specific book using the POST parameter 'review'
- DELETE /api/review/{uuid}
Destroy a review

- GET /api/timeline
Receive the index of the user timeline

- POST /api/user/login
Logs the user in the api middleware using the POST parameter 'user'

## TODO

- implement controllers
- unit tests

## License

The tboox web api is open-sourced software licensed under the [GPLv2 license](https://www.gnu.org/licenses/gpl-2.0.html)
