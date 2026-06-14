# City Break Blog

This is a web development project created for university, representing a blogging platform dedicated to recommendations and reviews for "City Break" destinations. The application allows users to discover new cities, read articles, and interact through comments.

---

##   Key Features

- **Authentication System:** Secure user registration (`signup.php`) and login (`login.php`).
- **Article CRUD Management:** Authorized users can add (`new_article.php`), edit (`edit_article.php`), and delete blog posts.
- **Interactive Photo Gallery:** Ability to manage images and galleries specific to each destination.
- **Commenting System:** Users can leave feedback and discuss published articles.
- **Admin Panel:** Dedicated section for managing users, cities, and photo galleries.

---

##  Technologies Used

### Backend & Core Logic
- **PHP** (used for form processing, session handling, authentication, and business logic)
- **Composer** (dependency manager for PHP packages)

### Database
- **MySQL / SQL Server** (stores data for users, articles, and comments; the schema is located in `photogallery.sql`)

### Frontend & UI
- **HTML5 & CSS3**
- **Bootstrap** (for a modern and fully responsive design)
- **Smarty Template Engine** (decouples PHP logic from the presentation layer using `.tpl` files inside the `templates` directory)

---

##  Project Structure

The application follows a clean architecture, separating the backend from the visual layout:

- `/templates` — Contains the visual templates (`.tpl` files such as `base.tpl`, `index_base.tpl`) defining the graphical interface.
- `/vendor` — External libraries and dependencies managed via Composer.
- `/CSS` & `/pictures` — Static assets for styling and images.
- Root `.php` files — Handle routing, form submissions, and database interactions.
- `photogallery.sql` — SQL script to initialize the database tables.
