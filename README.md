# Delivery Boy API

This API allows you to manage delivery boy information and perform related actions.

## Getting Started

### Prerequisites
- PHP 7.0 or higher
- MySQL (or any other preferred database)

### Installation

1. Clone the repository:

2. Install dependencies:

### Configuration

1. Rename the `config-sample.php` file to `config.php` in the `Common` directory.

2. Update the database credentials in the `config.php` file.
3. In summary, by including the db.php file in your configuration file (config.php in this example), you can access the Database class instance ($db) and utilize its methods for database operations. Remember to adjust the file paths and class methods as per your project structure and requirements

### API Endpoints

- `GET /delivery-boys`: Retrieve a list of all delivery boys.
- `POST /delivery-boys`: log a delivery boy.
- `POST /delivery-boys`: Accept/rejected a delivery request.
- `POST /delivery-boys`: Accept/rejected a pickup request.
- `POST /delivery-boys`: Accept a opening balanced request.
- `POST /delivery-boys`: Add a expense delivery boy.
- `POST /delivery-boys`: Change account password delivery boy.
- `POST /delivery-boys`: edit profile delivery boy.
- `POST /delivery-boys`: mange delivery history.
- `POST /delivery-boys`: mange pick up history.
- `POST /delivery-boys`: send transitions or closing balnced.
- `GET /delivery-boys`: mange dashboard.
- `GET /delivery-boys`: dropdown expense.
- `GET /delivery-boys/{id}`: Retrieve information about a specific delivery boy.
- ... (list other endpoints and their descriptions)






