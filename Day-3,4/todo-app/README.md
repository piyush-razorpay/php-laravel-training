## API Spec:

#### BASE_URL - 127.0.0.1:8000
1. GET {{BASE_URL}}/api/tasks -> Returns paginated list of tasks
2. GET {{BASE_URL}}/api/tasks/{task_id} -> Returns the task with provided task_id
3. POST {{BASE_URL}}/api/tasks -> Creates a new task resource.  
{  
    "title" : "Buy groceries",  
    "description" : "Buy flour and vegetables"  
}
4. PATCH {{BASE_URL}}/api/tasks/{task_id} -> Updates the status of the task with given task_id.  
{  
    "status" : "In Progress"  
}
6. DELETE {{BASE_URL}}/api/tasks/{task_id} -> Deletes the task with given task_id

