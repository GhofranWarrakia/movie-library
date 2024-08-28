The Movie Library Management project built using Laravel is a RESTful API that allows you to manage a collection of movies within a database. The project provides basic CRUD functionalities (Create, Read, Update, Delete) along with advanced features like filtering, sorting, and pagination. Here's an explanation of how the project works:

### Project Components:
1. **Movie Model**:
   - Represents the movie within the system and includes the following fields:
     - `title`: The movie's title.
     - `director`: The movie's director.
     - `genre`: The movie's genre (Drama, Action, etc.).
     - `release_year`: The movie's release year.
     - `description`: A description of the movie.

2. **MovieController**:
   - Responsible for handling operations on movies through HTTP requests.

### Core Methods:
1. **index**:
   - Displays a list of movies stored in the database.
   - Supports filtering by genre or director.
   - Supports sorting by release year.
   - Can paginate the results to determine the number of movies displayed per page.

2. **store**:
   - Used to create a new movie. It receives data via a `POST` request.
   - Validates the input data to ensure it meets specified conditions (e.g., `title` and `director` are required, and the release year must be between 1888 and the current year).
   - If the data is valid, the movie is created in the database, and the system returns a response with the new movie's details and an HTTP status 201.

3. **show**:
   - Displays the details of a specific movie based on its `id`.
   - If the movie exists, its data is returned in the response. If the movie is not found, the system returns an error.

4. **update**:
   - Used to update the information of an existing movie. It receives data via a `PUT` or `PATCH` request.
   - Validates the input data.
   - If the data is valid and the movie is found, the movie's data is updated, and the updated data is returned.

5. **destroy**:
   - Used to delete a movie from the database based on its `id`.
   - If the movie is found, it is deleted, and an empty response with an HTTP status 204 is returned, indicating that the operation was successful.

### Advanced Features:
- **Filtering**:
  - Users can filter movies in the list by genre or director.

- **Sorting**:
  - Users can sort movies by release year in ascending or descending order.

- **Pagination**:
  - Allows specifying the number of movies displayed per page using pagination, enabling a smaller set of movies to be shown per page instead of displaying all at once.

### How to Use the Project:
- Users send HTTP requests to the API to manage movies. They can:
  - Browse movies (`index`).
  - Add a new movie (`store`).
  - View details of a specific movie (`show`).
  - Update an existing movie's details (`update`).
  - Delete a movie from the library (`destroy`).

### Summary:
This project allows you to manage a movie library in a flexible and easy manner by providing a REST-compliant API, making it suitable for web or mobile applications that need to manage and browse movie content.
License
This project is licensed under the FocalX License.

### Credits
Ghofran Warrakia

### Contact
For any inquiries or support, please contact:

### GitHub: https://github.com/GhofranWarrakia
### LinkedIn: GhofranWarrakia
