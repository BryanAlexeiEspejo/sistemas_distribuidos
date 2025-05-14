import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import axios from "axios";

function ShowUser({ userId }) {
    const [user, setUser] = useState(null);

    useEffect(() => {
        // Fetch user details from API
        axios.get(`/api/usuarios/${userId}`)
            .then(response => {
                setUser(response.data);
            })
            .catch(error => {
                console.error("Error fetching user details:", error);
            });
    }, [userId]);

    if (!user) {
        return <div>Cargando...</div>;
    }

    return (
        <div className="container">
            <h1>Detalle del Usuario</h1>
            <div className="mb-3">
                <strong>ID:</strong> {user.id}
            </div>
            <div className="mb-3">
                <strong>Nombre:</strong> {user.nombre}
            </div>
            <div className="mb-3">
                <strong>Apellido:</strong> {user.apellido}
            </div>
            <div className="mb-3">
                <strong>Email:</strong> {user.email}
            </div>
            <div className="mb-3">
                <strong>Rol:</strong> {user.role.name}
            </div>
            <div className="mb-3">
                <strong>Estado:</strong> {user.estado.nombre}
            </div>
            <div className="mb-3">
                <strong>Género:</strong> {user.genero.nombre_genero}
            </div>
            <a href="/usuarios" className="btn btn-secondary">Volver</a>
        </div>
    );
}

export default ShowUser;

if (document.getElementById("show-usuario")) {
    const userId = document.getElementById("show-usuario").getAttribute("data-user-id");
    ReactDOM.render(<ShowUser userId={userId} />, document.getElementById("show-usuario"));
}
