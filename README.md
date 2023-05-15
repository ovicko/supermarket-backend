
## About Project
CRUD – Add supermarket, Edit supermarkets, List supermarkets in Alphabetical order – User should be able to pick whether to view as grid or as list.
Add managers to a supermarket and import employees under a manager via CSV import.(employees can be of two types. backoffice or cashiers)
Add suppliers to a supermarket via CSV import.

## API Endpoints
API Base URL: domain.com/v1/  

    supermarkets/add
    supermarkets/list
    supermarkets/view/{id}
    supermarkets/delete/{id}
    supermarkets/update/{id}
    supermarkets/supplier/upload/{id} [TBD]

    employees/add
    employees/list
    employees/view/{id}
    employees/delete/{id}
    employees/update/{id}

    suppliers/add
    suppliers/list
    suppliers/view/{id}
    suppliers/delete/{id}
    suppliers/update/{id}

    managers/add
    managers/list
    managers/view/{id}
    managers/delete/{id}
    managers/update/{id}
    managers/employee/upload/{id}

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
