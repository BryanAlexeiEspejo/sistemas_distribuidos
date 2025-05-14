import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import axios from "axios";

function CrearUsuario() {
    const [roles, setRoles] = useState([]);
    const [estados, setEstados] = useState([]);
    const [generos, setGeneros] = useState([]);
    const [formData, setFormData] = useState({
        nombre: "",
        apellido: "",
        email: "",
        password: "",
        role_id: "",
        estado_id: "",
        genero_id: "",
    });

    useEffect(() => {
        axios.get("/api/usuarios/create")
            .then(response => {
                setRoles(response.data.roles);
                setEstados(response.data.estados);
                setGeneros(response.data.generos);
            })
            .catch(error => {
                console.error(error);
            });
    }, []);

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        axios.post("/api/usuarios", formData)
            .then(response => {
                window.location.href = "/usuarios";
            })
            .catch(error => {
                console.error(error);
            });
    };

    return (
        <div className="container">
            <h1>Crear Usuario</h1>
            <form onSubmit={handleSubmit}>
                <div className="mb-3">
                    <label htmlFor="nombre" className="form-label">Nombre</label>
                    <input
                        type="text"
                        className="form-control"
                        id="nombre"
                        name="nombre"
                        value={formData.nombre}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div className="mb-3">
                    <label htmlFor="apellido" className="form-label">Apellido</label>
                    <input
                        type="text"
                        className="form-control"
                        id="apellido"
                        name="apellido"
                        value={formData.apellido}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div className="mb-3">
                    <label htmlFor="email" className="form-label">Email</label>
                    <input
                        type="email"
                        className="form-control"
                        id="email"
                        name="email"
                        value={formData.email}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div className="mb-3">
                    <label htmlFor="password" className="form-label">Contraseña</label>
                    <input
                        type="password"
                        className="form-control"
                        id="password"
                        name="password"
                        value={formData.password}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div className="mb-3">
                    <label htmlFor="role_id" className="form-label">Rol</label>
                    <select
                        className="form-select"
                        id="role_id"
                        name="role_id"
                        value={formData.role_id}
                        onChange={handleChange}
                        required
                    >
                        <option value="">Seleccionar</option>
                        {roles.map(role => (
                            <option key={role.id} value={role.id}>{role.name}</option>
                        ))}
                    </select>
                </div>
                <div className="mb-3">
                    <label htmlFor="estado_id" className="form-label">Estado</label>
                    <select
                        className="form-select"
                        id="estado_id"
                        name="estado_id"
                        value={formData.estado_id}
                        onChange={handleChange}
                        required
                    >
                        <option value="">Seleccionar</option>
                        {estados.map(estado => (
                            <option key={estado.id} value={estado.id}>{estado.nombre}</option>
                        ))}
                    </select>
                </div>
                <div className="mb-3">
                    <label htmlFor="genero_id" className="form-label">Género</label>
                    <select
                        className="form-select"
                        id="genero_id"
                        name="genero_id"
                        value={formData.genero_id}
                        onChange={handleChange}
                        required
                    >
                        <option value="">Seleccionar</option>
                        {generos.map(genero => (
                            <option key={genero.id_genero} value={genero.id_genero}>{genero.nombre_genero}</option>
                        ))}
                    </select>
                </div>
                <button type="submit" className="btn btn-primary">Guardar</button>
            </form>
        </div>
    );
}

export default CrearUsuario;

if (document.getElementById('crear-usuario')) {
    ReactDOM.render(<CrearUsuario />, document.getElementById('crear-usuario'));
}
