# School of Hard Codes – Laravel CRUD System

A Laravel 12 application implementing a mini school management system with CRUD for **Students**, **Courses**, and **Professors**.  
Uses **Bootstrap 5** for UI, Eloquent ORM for database operations, and Laravel Factories/Seeders for generating sample data.

**GitHub Repo:** [my-first-laravel-app](https://github.com/Oyemahak/my-first-laravel-app)

---

## ✨ Features
### Students
- Create, read, update, delete students
- Email validation & uniqueness
- Multi-course enrollment via many-to-many relationship

### Courses
- Create, read, update, delete courses
- Optional professor assignment (one-to-one relationship)
- Unique professor restriction per course
- Description field with validation

### Professors
- Migration, factory, and seeder with realistic fake names & departments
- Some professors intentionally left unassigned for course assignment

### General
- Clean Bootstrap layout with consistent form styling
- Navigation bar with quick access to all sections
- Server-side validation with error messages & flash success alerts
- Database seeding with realistic relational data

---

## 🚀 Setup Instructions

### 1. Clone the Repository
```bash
git clone https://github.com/Oyemahak/my-first-laravel-app.git
cd my-first-laravel-app