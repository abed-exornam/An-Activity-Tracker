📌 Application Support Tracking System
This is a Laravel-based web application designed to track and manage the daily activities of an Application Support Team. It provides an efficient way to log, update, and report activities, ensuring smooth workflow tracking and accountability.

📋 Features
✅ Activity Logging – Users can input daily activities, including SMS counts and log comparisons.
✅ Edit & Update Activities – Modify activity details, update remarks, and change status.
✅ Search - Search for activities either by name or status
✅ Daily View – List all activities for the current day.
✅ Reporting – Generate reports for a specific date range.
✅ User Authentication – Secure login/logout for access control.

📂 Project Structure
/app
   ├── Http/
   │   ├── Controllers/
   │   │   ├── ActivityController.php
   │   │   ├── Auth/
   │   │   ├── HomeController.php
   │   ├── Middleware/
   ├── Models/
   │   ├── Activity.php
/resources
   ├── views/
   │   ├── layouts/
   │   │   ├── app.blade.php
   │   ├── activities/
   │   │   ├── activities.blade.php
   │   │   ├── create.blade.php
   │   │   ├── edit.blade.php
/routes
   ├── web.php
   
🔗 Main Pages & Routes
Page	                                       Route	Description
Activity List	/activities	                   Displays all logged activities
Add Activity	/activities/create	           Page to create a new activity
Edit Activity	/activities/{id}/edit	         Edit an existing activity
Daily View	/daily-activities	               Shows only today’s logged activities
Generate Report	/activities/report	         Generates reports by date range
📝 Notes
The system ensures accurate tracking of SMS counts compared to log values.

Users can only modify activities they have access to.

Reports help in analyzing trends over time.
