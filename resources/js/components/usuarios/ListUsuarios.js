import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import axios from "axios";

function ListUsuarios() {
    const [users, setUsers] = useState([]);
    const [search, setSearch] = useState(""); // Estado para el buscador
    const [currentPage, setCurrentPage] = useState(1); // Página actual
    const [lastPage, setLastPage] = useState(1); // Última página disponible

    useEffect(() => {
        fetchUsers();
    }, [search, currentPage]); // Refrescar cuando cambie la búsqueda o la página actual

    const fetchUsers = () => {
        axios.get(`/api/usuarios?page=${currentPage}&search=${search}`)
            .then(response => {
                setUsers(response.data.data);
                setCurrentPage(response.data.current_page);
                setLastPage(response.data.last_page);
            })
            .catch(error => {
                console.error("Error al obtener los usuarios", error);
            });
    };

    const handleDelete = (id) => {
        if (window.confirm("¿Estás seguro de eliminar este usuario?")) {
            axios.delete(`/api/usuarios/${id}`)
                .then(() => {
                    fetchUsers(); // Recargar la lista después de eliminar
                })
                .catch(error => {
                    console.error("Hubo un error al eliminar el usuario", error);
                });
        }
    };

    const handleSearchChange = (e) => {
        setSearch(e.target.value);
        setCurrentPage(1); // Reiniciar a la página 1 al buscar
    };

    const handlePagination = (direction) => {
        if (direction === "prev" && currentPage > 1) {
            setCurrentPage(currentPage - 1);
        } else if (direction === "next" && currentPage < lastPage) {
            setCurrentPage(currentPage + 1);
        }
    };

    return (

        <div className="container">
<br />
            <br />

            <div class="d-flex justify-content-start mt-4 pl-4">
                <a href="{{ url('home') }}" class="btn btn-primary btn-sm">
                    ⬅️ Volver al inicio
                </a>
            </div>
            <br />
            <h1>Lista de Usuarios</h1>
            <div className="d-flex justify-content-between mb-3">

                <a href="/usuarios/create" className="btn btn-primary">Crear Usuario</a>
                <input
                    type="text"
                    className="form-control w-50"
                    placeholder="Buscar por nombre, apellido o email"
                    value={search}
                    onChange={handleSearchChange}
                />
            </div>
            <table className="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Género</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {users.length > 0 ? (
                        users.map(user => (
                            <tr key={user.id}>
                                <td>{user.id}</td>
                                <td>{user.nombre}</td>
                                <td>{user.apellido}</td>
                                <td>{user.email}</td>
                                <td>{user.role?.name || "N/A"}</td>
                                <td>{user.estado?.nombre || "N/A"}</td>
                                <td>{user.genero?.nombre_genero || "N/A"}</td>
                                <td>
                                    <a href={`/usuarios/${user.id}`} className="btn btn-info btn-sm">Ver</a>
                                    <a href={`/usuarios/${user.id}/edit`} className="btn btn-warning btn-sm">Editar</a>
                                    <button
                                        onClick={() => handleDelete(user.id)}
                                        className="btn btn-danger btn-sm"
                                    >
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        ))
                    ) : (
                        <tr>
                            <td colSpan="8" className="text-center">No se encontraron usuarios</td>
                        </tr>
                    )}
                </tbody>
            </table>
            <div className="d-flex justify-content-between">
                <button
                    className="btn btn-secondary"
                    disabled={currentPage === 1}
                    onClick={() => handlePagination("prev")}
                >
                    Anterior
                </button>
                <span>Página {currentPage} de {lastPage}</span>
                <button
                    className="btn btn-secondary"
                    disabled={currentPage === lastPage}
                    onClick={() => handlePagination("next")}
                >
                    Siguiente
                </button>
            </div>
        </div>
    );
}

export default ListUsuarios;

if (document.getElementById("list-usuarios")) {
    ReactDOM.render(<ListUsuarios />, document.getElementById("list-usuarios"));
}

