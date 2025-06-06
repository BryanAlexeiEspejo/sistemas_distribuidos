import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import axios from "axios";

function ListPaises() {
    const [countries, setCountries] = useState([]);
    const [pagination, setPagination] = useState({});
    const [search, setSearch] = useState("");
    const [message, setMessage] = useState(null);

    useEffect(() => {
        fetchCountries();
    }, []);

    const fetchCountries = async (page = 1) => {
        try {
            const res = await axios.get(`/api/countries?page=${page}`);
            setCountries(res.data.data);
            setPagination(res.data);
        } catch (error) {
            console.error("Error fetching countries", error);
        }
    };

    const deleteCountry = async (id) => {
        if (!confirm("¿Eliminar este país?")) return;
        try {
            await axios.delete(`/api/countries/${id}`);
            setMessage("País eliminado exitosamente.");
            fetchCountries();
        } catch (error) {
            console.error("Error eliminando país", error);
            setMessage("Error eliminando país.");
        }
    };

    return (
        <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <h1 className="text-3xl font-bold text-gray-800 mb-6">🌍 Gestión de Países</h1>

            <div className="flex flex-col md:flex-row gap-4 mb-6">
                <input
                    type="text"
                    value={search}
                    onChange={(e) => setSearch(e.target.value)}
                    className="w-full md:w-2/3 px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-400"
                    placeholder="🔍 Buscar por nombre de país..."
                />

                <button
                    onClick={() => fetchCountries()}
                    className="w-full md:w-1/3 px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition duration-200"
                >
                    Buscar
                </button>
            </div>

            <div className="mb-4">
                <a
                    href="/countries/create"
                    className="inline-block px-4 py-2 bg-green-600 text-white font-medium rounded hover:bg-green-700 transition duration-200"
                >
                    ➕ Agregar País
                </a>
            </div>

            {message && (
                <div className="bg-green-100 text-green-800 px-4 py-3 rounded mb-4 border border-green-300">
                    {message}
                </div>
            )}

            <div className="overflow-x-auto">
                <table className="min-w-full bg-white border border-gray-200 shadow-sm rounded-lg overflow-hidden">
                    <thead className="bg-gray-100 text-gray-700 text-sm uppercase">
                        <tr>
                            <th className="px-6 py-3 text-left border-b">ID</th>
                            <th className="px-6 py-3 text-left border-b">Nombre</th>
                            <th className="px-6 py-3 text-left border-b">Código Teléfono</th>
                            <th className="px-6 py-3 text-left border-b">Activo</th>
                            <th className="px-6 py-3 text-left border-b">Acciones</th>
                        </tr>
                    </thead>
                    <tbody className="text-gray-700">
                        {countries.filter((c) =>
                            c.country_name.toLowerCase().includes(search.toLowerCase())
                        ).map((country) => (
                            <tr key={country.country_id} className="hover:bg-gray-50">
                                <td className="px-6 py-3 border-b">{country.country_id}</td>
                                <td className="px-6 py-3 border-b">{country.country_name}</td>
                                <td className="px-6 py-3 border-b">{country.phone_code}</td>
                                <td className="px-6 py-3 border-b">
                                    <span
                                        className={`inline-block px-2 py-1 rounded-full text-xs font-semibold ${country.is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}`}
                                    >
                                        {country.is_active ? "Sí" : "No"}
                                    </span>
                                </td>
                                <td className="px-6 py-3 border-b flex flex-wrap gap-2">
                                    <a
                                        href={`/countries/${country.country_id}/edit`}
                                        className="inline-block px-3 py-1 text-sm bg-yellow-400 text-white rounded hover:bg-yellow-500 transition"
                                    >
                                        ✏️ Editar
                                    </a>
                                    <button
                                        onClick={() => deleteCountry(country.country_id)}
                                        className="inline-block px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700 transition"
                                    >
                                        🗑️ Eliminar
                                    </button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>

            <div className="flex justify-center mt-6 gap-2">
    {pagination.links && pagination.links.map((link, index) => {
        const cleanLabel = link.label === 'pagination.previous'
            ? 'Anterior'
            : link.label === 'pagination.next'
            ? 'Siguiente'
            : link.label;

        return (
            <button
                key={index}
                disabled={!link.url}
                onClick={() => {
                    if (link.url) {
                        const url = new URL(link.url);
                        const page = url.searchParams.get("page");
                        fetchCountries(page);
                    }
                }}
                className={`px-3 py-1 border rounded ${
                    link.active ? 'bg-blue-600 text-white' : 'bg-white text-gray-800 hover:bg-gray-100'
                }`}
                dangerouslySetInnerHTML={{ __html: cleanLabel }}
            />
        );
    })}
</div>

        </div>
    );
}

export default ListPaises;

if (document.getElementById("ListPaises")) {
    ReactDOM.render(<ListPaises />, document.getElementById("ListPaises"));
}
