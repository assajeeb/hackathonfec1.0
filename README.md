🚀 Brain Battle 1,0 Hackathon Problemset 

🛠 Tech Stack
Framework: Laravel Framework 11.42.1
Database: MySQL
APIs: 3rd party Api: https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent for Ai-Free Code Submision

⚙️ Installation & Setup
PHP >= 8.2

Composer

MySQL 

Laravel Installer (optional)

Steps:

# Clone the repository
git clone https://github.com/assajeeb/hackathonfec1.0.git
cd hackathonfec1.0

# Install dependencies
composer install

# Set up database
edit 
DB_DATABASE=hackathon_fec
DB_USERNAME=root
DB_PASSWORD=

# Configure database in .env file, then run migrations
php artisan migrate:refresh --seed
php artisan db:seed --class=ExamRoomAllocationSeeder
php artisan db:seed --class=LibraryBookSeeder
php artisan db:seed --class=NoticeBoardSeeder
php artisan db:seed --class=WifiloginHistorySeeder


# Start the development server
php artisan serve

🚀Usage
Open http://127.0.0.1:8000 in your browser.


Problem 1:

Endpoint GET /api/health
Full Api: http://127.0.0.1:8000/api/health

Response:

{
    "status": "ok",
    "server_time": "2025-02-18T23:21:25+00:00"
}



Problem 2:

Endpoint GET /api/exam-room/{student_id}

Full Api: http://127.0.0.1:8000/api/exam-room/{student_id}

Response:

{
    "student_id": 608236,
    "exam_room": "Room 158",
    "seat_number": 1
}



Problem 3:

Endpoint POST /api/wifi-login

Full Api: http://127.0.0.1:8000/api/wifi-login

Request:

{
    "student_id":322445,
    "timestamp":"2025-02-11T10:30:00Z"
}

Response:
{
    "message": "Login recorded",
    "student_id": 322445,
    "login_count": 1
}


Problem 4:

Endpoint GET /api/library/book/{isbn}
Full Api  http://127.0.0.1:8000/api/library/book/{isbn}

Response: 

{
    "isbn": 3432030595106,
    "title": "Frankenstein",
    "available": true,
    "copies_left": 9
}


Problem 5:

Endpoint POST /api/cantten/order

 Full Api http://127.0.0.1:8000/api/cantten/order

Request:

{
    "student_id":232323,
    "items":[
        {"item_id":"burger","quantity": 2 ,"price":10},
         {"item_id":"fries","quantity": 1 ,"price":10}
    ],
    "order_time":"2025-02-11T12:00:00Z"
}

Response: 
{
    "order_id": 65892,
    "status": "Order placed",
    "total_price": 30
}


Problem 6:

Endpoint POST /api/attendance
Full Api http://127.0.0.1:8000/api/attendance

Request:
{
    "class_id":"CSE101",
    "date":"2025-02-11",
    "present_students":[220345,220357,220348]
}

Response:

{
    "message": "Attendance recorded",
    "total_present": 3
}

Problem 7:

Endpoint POST /api/emergency
Full Api http://127.0.0.1:8000/api/emergency


Request:
{
    "type":"Medical",
    "location":"Building A, Room 101",
    "details":"Student got senseless in examination hall as soon as looking over question or may be low blood suger"
}

Response:

{
    "message": "Emergency alert send",
    "response_team": "Medical Unit"
}

Problem 8:

Endpoint GET /api/notices
Full Api http://127.0.0.1:8000/api/notices

Response:

[
    {
        "id": 9,
        "title": "Holiday Announcement",
        "date": "2025-02-18"
    },
    {
        "id": 8,
        "title": "Midterm Exam Preparation Tips",
        "date": "2025-02-17"
    },
    {
        "id": 7,
        "title": "COVID-19 Safety Guidelines",
        "date": "2025-02-16"
    },
    {
        "id": 6,
        "title": "New Teacher Introduction",
        "date": "2025-02-15"
    },
    {
        "id": 5,
        "title": "Annual Science Fair",
        "date": "2025-02-14"
    },
    {
        "id": 4,
        "title": "Cultural Event Invitation",
        "date": "2025-02-13"
    },
    {
        "id": 3,
        "title": "School Maintenance Notice",
        "date": "2025-02-12"
    },
    {
        "id": 2,
        "title": "Scholarship Application Deadline",
        "date": "2025-02-11"
    },
    {
        "id": 1,
        "title": "Annual Science Fair",
        "date": "2025-02-10"
    }
]


Problem 9:

Dockerfile is created with name Dockerfile


docker build -t hackathon/laravel:0.1 .


 docker run -p 8080:80  hackathon/laravel:0.1



Problem 10:

Endpoint POST /api/students

Full Api http://127.0.0.1:8000/api/students

Request:

{
    "name":"Sheikh Rezwan Hosen Sajeeb",
    "student_id":404040,
    "department":"CSE"
}

Response:

{
    "id": 1,
    "name": "Sheikh Rezwan Hosen Sajeeb",
    "student_id": 404040,
    "department": "CSE",
    "status": "Created"
}


Endpoint GET /api/students/{student_id}
Full Api http://127.0.0.1:8000/api/students/{student_id}



Response:

{
    "id": 1,
    "name": "Sheikh Rezwan Hosen Sajeeb",
    "student_id": 404040,
    "department": "CSE"
}



Endpoint PUT /api/students/{student_id}
Full Api http://127.0.0.1:8000/api/students/{student_id}


Request

{
    "name":"Sheikh Rezwan",
    "student_id":404040,
    "department":"CSE"
}


Response:

{
    "id": 1,
    "name": "Sheikh Rezwan",
    "student_id": 404040,
    "department": "CSE",
    "status": "Updated"
}


Endpoint DELETE /api/students/{student_id}

Full Api http://127.0.0.1:8000/api/students/{student_id}

Response:


{
    "id": 1,
    "name": "Sheikh Rezwan",
    "student_id": 404040,
    "department": "CSE",
    "status": "Deleted"
}





Bonus Problem:

Endpoint POST /api/code-submission

Full Api http://127.0.0.1:8000/api/code-submission

Request:

{
    "student_id":404040,
    "code":"IiIiClRoaXMgc2NyaXB0IGNhbGN1bGF0ZXMgdGhlIGZhY3RvcmlhbCBvZiBhIG51bWJlciB1c2luZyByZWN1cnNpb24uCkl0IGFsc28gaW5jbHVkZXMgZXhjZXNzaXZlIGNvbW1lbnRzLCB1bm5lY2Vzc2FyeSBkb2NzdHJpbmdzLCBhbmQgYSBzdHJ1Y3R1cmVkIGZvcm1hdCAKdGhhdCBtaWdodCBpbmRpY2F0ZSBBSSBnZW5lcmF0aW9uLgoiIiIKCmRlZiBmYWN0b3JpYWwobjogaW50KSAtPiBpbnQ6CiAgICAiIiIKICAgIFRoaXMgZnVuY3Rpb24gY2FsY3VsYXRlcyB0aGUgZmFjdG9yaWFsIG9mIGEgZ2l2ZW4gbnVtYmVyIHVzaW5nIHJlY3Vyc2lvbi4KICAgIDpwYXJhbSBuOiBUaGUgbnVtYmVyIGZvciB3aGljaCB0aGUgZmFjdG9yaWFsIGlzIHRvIGJlIGNhbGN1bGF0ZWQuCiAgICA6cmV0dXJuOiBUaGUgZmFjdG9yaWFsIHZhbHVlIG9mIHRoZSBpbnB1dCBudW1iZXIuCiAgICAiIiIKICAgIAogICAgIyBCYXNlIGNhc2U6IElmIHRoZSBudW1iZXIgaXMgMCBvciAxLCByZXR1cm4gMSBhcyBmYWN0b3JpYWwgb2YgMCBhbmQgMSBpcyAxCiAgICBpZiBuID09IDAgb3IgbiA9PSAxOgogICAgICAgIHJldHVybiAxCiAgICAKICAgICMgUmVjdXJzaXZlIGNhc2U6IE11bHRpcGx5IHRoZSBudW1iZXIgYnkgdGhlIGZhY3RvcmlhbCBvZiAobi0xKQogICAgcmV0dXJuIG4gKiBmYWN0b3JpYWwobiAtIDEpCgppZiBfX25hbWVfXyA9PSAiX19tYWluX18iOgogICAgIiIiCiAgICBNYWluIGV4ZWN1dGlvbiBibG9jayB0byB0ZXN0IHRoZSBmYWN0b3JpYWwgZnVuY3Rpb24uCiAgICAiIiIKICAgIAogICAgIyBJbnB1dDogQXNraW5nIHRoZSB1c2VyIHRvIGVudGVyIGEgbnVtYmVyCiAgICB0cnk6CiAgICAgICAgbnVtID0gaW50KGlucHV0KCJFbnRlciBhIG5vbi1uZWdhdGl2ZSBpbnRlZ2VyOiAiKSkKICAgICAgICAKICAgICAgICAjIEVuc3VyZSB0aGUgaW5wdXQgaXMgbm9uLW5lZ2F0aXZlCiAgICAgICAgaWYgbnVtIDwgMDoKICAgICAgICAgICAgcHJpbnQoIkZhY3RvcmlhbCBpcyBub3QgZGVmaW5lZCBmb3IgbmVnYXRpdmUgbnVtYmVycy4iKQogICAgICAgIGVsc2U6CiAgICAgICAgICAgICMgQ2FsbCB0aGUgZmFjdG9yaWFsIGZ1bmN0aW9uIGFuZCBwcmludCB0aGUgcmVzdWx0CiAgICAgICAgICAgIHByaW50KGYiRmFjdG9yaWFsIG9mIHtudW19IGlzOiB7ZmFjdG9yaWFsKG51bSl9IikKICAgIGV4Y2VwdCBWYWx1ZUVycm9yOgogICAgICAgIHByaW50KCJJbnZhbGlkIGlucHV0ISBQbGVhc2UgZW50ZXIgYW4gaW50ZWdlci4iKQo="
    

}

Response :


{
    "message": "Rejected: AI-generated code detected"
}




















