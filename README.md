# softlock-task
 A Laravel application that allows users to encrypt and decrypt files using AES-256-CBC via the OpenSSL library. Users can select files, view details, and perform cryptographic operations with customizable save options for encrypted/decrypted files.


## Features

- **File Selection**: Users can select any file from their computer.
- **File Details Display**: The application displays the file name, size, and extension.
- **Encryption**: Encrypt files using AES-256-CBC.
- **Decryption**: Decrypt files that were previously encrypted.
- **Custom Save Options**: Choose the name and location for saving encrypted or decrypted files.

## Technologies Used

- **PHP**: For server-side scripting.
- **Laravel**: As the web framework.
- **Blade**: For templating.
- **OpenSSL**: For encryption and decryption.
- **Environment Variables**: To store encryption keys.
- **HTML/CSS**: For the front-end structure and styling.
- **JavaScript**: To handle file details and user interactions.

## Installation

To run SoftLock Task locally, follow these steps:

1. Clone the repository: `git clone https://github.com/yourusername/softlock-task.git`
2. Navigate to the project directory
3. Install Composer dependencies: `composer install`
4. Copy the `.env.example` file to `.env` :  `cp .env.example .env`
5. Generate Laravel application key: `php artisan key:generate`
6. Configure your environment variables, including custom encryption keys. Open the .env file in your preferred text editor and add the following custom variables:
`KEY="321320"
IV="5252525252552525"
CIPHER="aes-256-cbc"`
6. Start the development server: `php artisan serve`
7. Open your web browser and navigate to `http://localhost:8000/`

## How to Test

1. **Navigate to the `Task-app` directory and run the application:**
   ```sh
   cd Task-app
   php artisan serve
2. Open your web browser and navigate to `http://localhost:8000/`.
3. Select a file from your computer.
4. The application will display the file name, size, and extension.
5. Choose to encrypt the file and specify the save location.
6. Try to open the encrypted file; it should not be readable.
7. Use the application to decrypt the encrypted file and save it.
8. Verify that the decrypted file matches the original file.

## Code Overview

- **Blade View** (`upload.blade.php`):
  - Contains the input form for file selection.
  - Uses JavaScript to display file details and handle encrypt/decrypt operations.

- **Controller** (`UploadFileController`):
  - **upload**: Returns the `upload` view.
  - **uploadPost**: Handles the uploaded file, retrieves its content.
  - **operation**: Handles the encryption and decryption logic using the OpenSSL library, and saves the file as specified by the user.
