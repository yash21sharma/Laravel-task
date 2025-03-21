<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel To-Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="container mt-4">

    <h2 class="mb-3">To-Do List</h2>

    <div class="input-group mb-3">
        <input type="text" id="taskInput" class="form-control" placeholder="Enter task...">
        <button class="btn btn-primary" id="addTask">Add</button>
    </div>

    <ul class="list-group" id="taskList"></ul>

    <button class="btn btn-secondary mt-3" id="showAll">Show All Tasks</button>

    <script>
        $(document).ready(function() {

            // Add Task
            $('#addTask').click(function() {
                var title = $('#taskInput').val().trim();
                if (title === '') {
                    alert('Task cannot be empty!');
                    return;
                }

                $.post('/tasks', {title: title, _token: '{{ csrf_token() }}'}, function(data) {
                    $('#taskList').append(`<li class="list-group-item d-flex justify-content-between align-items-center">
                        <input type="checkbox" class="taskCheckbox" data-id="${data.id}">
                        <span>${data.title}</span>
                        <button class="btn btn-danger btn-sm deleteTask" data-id="${data.id}">🗑️</button>
                    </li>`);
                    $('#taskInput').val('');
                }).fail(function(xhr) {
                    alert(xhr.responseJSON.message);
                });
            });

            // Mark Task as Completed
            $(document).on('change', '.taskCheckbox', function() {
                var id = $(this).data('id');
                var listItem = $(this).closest('li');

                $.ajax({
                    url: `/tasks/${id}`,
                    type: 'PATCH',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function() {
                        listItem.find('span').toggleClass('text-decoration-line-through');
                        if (listItem.find('.taskCheckbox').is(':checked')) {
                            listItem.fadeOut(300);
                        }
                    }
                });
            });

            // Delete Task
            $(document).on('click', '.deleteTask', function() {
                if (!confirm('Are you sure to delete this task?')) return;

                var id = $(this).data('id');
                $(this).closest('li').fadeOut(300, function() { $(this).remove(); });

                $.ajax({
                    url: `/tasks/${id}`,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                });
            });

            // Show All Tasks
            $('#showAll').click(function() {
                $.get('/tasks/all', function(tasks) {
                    $('#taskList').html('');
                    tasks.forEach(task => {
                        $('#taskList').append(`<li class="list-group-item d-flex justify-content-between align-items-center">
                            <input type="checkbox" class="taskCheckbox" data-id="${task.id}" ${task.completed ? 'checked' : ''}>
                            <span class="${task.completed ? 'text-decoration-line-through' : ''}">${task.title}</span>
                            <button class="btn btn-danger btn-sm deleteTask" data-id="${task.id}">🗑️</button>
                        </li>`);
                    });
                });
            });

        });
    </script>

</body>
</html>
