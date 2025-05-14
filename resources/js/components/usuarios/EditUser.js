import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import axios from "axios";

function EditUser({ userId }) {
    const [user, setUser] = useState({});
    const [roles, setRoles] = useState([]);
    const [estados, setEstados] = useState([]);
    const [generos, setGeneros] = useState([]);
    const [form, setForm] = useState({
        nombre: "",
        apellido: "",
        email: "",
        password: "",
        role_id: "",
        estado_id: "",
        genero_id: "",
    });

    useEffect(() => {
        axios.get(`/api/usuarios/${userId}/edit`)
            .then(response => {
                setUser(response.data.user);
                setRoles(response.data.roles);
                setEstados(response.data.estados);
                setGeneros(response.data.generos);
                setForm({
                    nombre: response.data.user.nombre,
                    apellido: response.data.user.apellido,
                    email: response.data.user.email,
                    password: "",
                    role_id: response.data.user.role_id,
                    estado_id: response.data.user.estado_id,
                    genero_id: response.data.user.genero_id,
                });
            });
    }, [userId]);

    const handleChange = (e) => {
        const { name, value } = e.target;
        setForm((prev) => ({
            ...prev,
            [name]: value,
        }));
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        axios.put(`/api/usuarios/${userId}`, form)
            .then(() => {
                window.location.href = "/usuarios";
            });
    };

    return (
        <div className="container">
            <h1>Editar Usuario</h1>
            <form onSubmit={handleSubmit}>
                <div className="mb-3">
                    <label htmlFor="nombre" className="form-label">Nombre</label>
                    <input
                        type="text"
                        className="form-control"
                        id="nombre"
                        name="nombre"
                        value={form.nombre}
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
                        value={form.apellido}
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
                        value={form.email}
                        onChange={handleChange}
                        required
                    />
                </div>
                <div className="mb-3">
                    <label htmlFor="password" className="form-label">Nueva Contraseña (Opcional)</label>
                    <input
                        type="password"
                        className="form-control"
                        id="password"
                        name="password"
                        value={form.password}
                        onChange={handleChange}
                    />
                </div>
                <div className="mb-3">
                    <label htmlFor="role_id" className="form-label">Rol</label>
                    <select
                        className="form-select"
                        id="role_id"
                        name="role_id"
                        value={form.role_id}
                        onChange={handleChange}
                        required
                    >
                        {roles.map((role) => (
                            <option key={role.id} value={role.id}>
                                {role.name}
                            </option>
                        ))}
                    </select>
                </div>
                <div className="mb-3">
                    <label htmlFor="estado_id" className="form-label">Estado</label>
                    <select
                        className="form-select"
                        id="estado_id"
                        name="estado_id"
                        value={form.estado_id}
                        onChange={handleChange}
                        required
                    >
                        {estados.map((estado) => (
                            <option key={estado.id} value={estado.id}>
                                {estado.nombre}
                            </option>
                        ))}
                    </select>
                </div>
                <div className="mb-3">
                    <label htmlFor="genero_id" className="form-label">Género</label>
                    <select
                        className="form-select"
                        id="genero_id"
                        name="genero_id"
                        value={form.genero_id}
                        onChange={handleChange}
                        required
                    >
                        {generos.map((genero) => (
                            <option key={genero.id_genero} value={genero.id_genero}>
                                {genero.nombre_genero}
                            </option>
                        ))}
                    </select>
                </div>
                <button type="submit" className="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    );
}

export default EditUser;

if (document.getElementById('editar-usuario')) {
    const userId = document.getElementById('editar-usuario').getAttribute('data-user-id');
    ReactDOM.render(<EditUser userId={userId} />, document.getElementById('editar-usuario'));
}
