/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Example');





require('./components/usuarios/ListUsuarios');
require('./components/usuarios/CrearUsuario');
require('./components/usuarios/EditUser');
require('./components/usuarios/UserDetail');

if (document.getElementById('list-usuarios')) {
    ReactDOM.render(<ListUsuarios />, document.getElementById('list-usuarios'));
}
if (document.getElementById('crear-usuario')) {
    ReactDOM.render(<CrearUsuario />, document.getElementById('crear-usuario'));
}
if (document.getElementById('editar-usuario')) {
    const userId = document.getElementById('editar-usuario').getAttribute('data-user-id');
    ReactDOM.render(<EditUser userId={userId} />, document.getElementById('editar-usuario'));
}
if (document.getElementById('user-detail')) {
    const userId = document.getElementById('user-detail').getAttribute('data-user-id');
    ReactDOM.render(<UserDetail userId={userId} />, document.getElementById('user-detail'));
}

require('./components/paises/ListPaises');
require('./components/paises/CreatePaises');

if (document.getElementById("ListPaises")) {
    ReactDOM.render(<ListPaises />, document.getElementById("ListPaises"));
}

if (document.getElementById("CreatePaises")) {
    ReactDOM.render(<CreatePaises />, document.getElementById("CreatePaises"));
}
