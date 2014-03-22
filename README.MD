/****************************************************
 * Program O AIML Interpreter/Chatbot Engine
 * Version 3.5.0 - CodeIgniter implementation
 * Written/Coded by Dave Morton
 * ©2013-2014 The Program O Group
 * Written 12-02-2013
 * README.MD
 * Provides an overview of the script, along with basic instructions on installation and use
 ****************************************************/


Introduction
---------------------------------------------------------
Program O is an AIML interpretor written in PHP, and uses a MySQL database to store chatbot information, including the AIML files used to formulate the chatbot's responses. This particular version uses a modified version of the CodeIgniter PHP framework.


Configuration
---------------------------------------------------------
Program O supports the creation of multiple chatbots. The individual bots are configured from the admin area. Bot specific variables are stored in the database. Configuration of Program O itself is done via the install and admin pages

Using the bot
---------------------------------------------------------
After installation you can chat with your Program O chatbot using one of three methods:

- Directly through your chatbot's URL (e.g. http://www.example/com/path/to/your/chatbot)
- Through an AJAX enabled web page that points to the API(e.g. http://www.example/com/path/to/your/chatbot/API)
- Through the Program O API (example in /gui/xml/index.php)

For advanced botmasters and programmers, it is possible to use the Program O API to access a chatbot from stand-alone applications through HTTP requests. for information on how to create and/or use such a stand-alone application, please visit the Program O Support Forums at http://www.program-o.com

Foreign Language Support
---------------------------------------------------------
v2.2 and higher now supports Unicode characters, allowing chatbots to be created that use non-English languages, such as Arabic, Chinese, French, Greek, Russian, Turkish, Thai, and many others.

Upgrade
---------------------------------------------------------
Program O version 3.5 and newer is a complete re-design from top to bottom, with a new database structure, enhanced and expanded features, and a more centralized


please contact us on the Program O forums at http://www.program-o.com/forum/

Clean install
---------------------------------------------------------
Program O provides an automatic installer for hassle-free installation. Simply point your web browser to your freshly uploaded Program O directory to run the install script. Then follow the instructions on the page. The installer is designed to only run once.

Please note that the installer script will NOT create your database for you, nor will it install your bot's AIML files. The database, along with the username/password used to access it, needs to be created in advance. See the file FRESH_INSTALL_README.txt for more information.

After you create the database, and once you complete the installation process, simply go to your new Program O admin page (e.g. http://www.example.com/ProgramO/admin) and log in using the admin credentials you provided during the install process. Then select "Upload AIML" from the navigation link on the left and upload your AIML files. Then sit back and enjoy your new bot!

