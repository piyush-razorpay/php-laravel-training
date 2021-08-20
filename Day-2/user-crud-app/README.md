## API Spec:
##### BASE_URL = 127.0.0.1:8000
1. GET {BASE_URL}/users
2. POST {BASE_URL}/users -
Request body: 
{
    "first_name": "Abraham",
    "last_name": "lincoln" 
}
3. GET {BASE_URL}/users/{id}
4. DELETE {BASE_URL}/users/{id}
5. PATCH {BASE_URL}/users/{id} - 
Request Body: 
{
    "first_name": "Abe"
}
