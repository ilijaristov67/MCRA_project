@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4 text-center">Employee List</h2>
    <div class="row" id="employeesContainer">

    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: `${window.location.origin}/api/getEmployees`,
            type: 'GET',
            success: function(response) {
                const employees = response.data;
                let employeeCards = '';

                employees.forEach(employee => {
                    employeeCards += `
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">${employee.employee_name} ${employee.employee_lastname}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">${employee.employee_title}</h6>
                                <p class="card-text">${employee.employee_bio}</p>
                                <p class="badge bg-${employee.employee_status === 'current' ? 'success' : 'secondary'}">
                                    ${employee.employee_status === 'current' ? 'Current Employee' : 'Past Employee'}
                                </p>
                                <p class="text-muted small">Created: ${new Date(employee.created_at).toLocaleDateString()}</p>
                                <p class="text-muted small">Updated: ${new Date(employee.updated_at).toLocaleDateString()}</p>
                            </div>
                        </div>
                    </div>`;
                });

                $('#employeesContainer').html(employeeCards);
            },
            error: function(error) {
                console.error('Error fetching employees:', error);
            }
        });
    });
</script>

@endsection