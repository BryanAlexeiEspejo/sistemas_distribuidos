import React, { useState } from "react";
import ReactDOM from "react-dom";
import axios from "axios";

function CreatePaises() {
    const [form, setForm] = useState({
        country_id: "",
        country_name: "",
        phone_code: "",
        is_active: true
    });

    const [errors, setErrors] = useState([]);
    const [successMessage, setSuccessMessage] = useState(null);

    const handleChange = (e) => {
        const { name, value, type, checked } = e.target;
        setForm({
            ...form,
            [name]: type === "checkbox" ? checked : value
        });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setErrors([]);
        setSuccessMessage(null);

        try {
            // Ajuste importante: padEnd para CHAR(2)
            const payload = {
                country_id: form.country_id.trim().padEnd(2, " "),
                country_name: form.country_name.trim(),
                phone_code: form.phone_code.trim(),
                is_active: form.is_active ? 1 : 0
            };

            await axios.post("/api/countries", payload);
            setSuccessMessage("País creado exitosamente.");
            setForm({ country_id: "", country_name: "", phone_code: "", is_active: true });
        } catch (error) {
            if (error.response?.data?.errors) {
                const messages = Object.values(error.response.data.errors).flat();
                setErrors(messages);
            } else if (error.response?.data?.error) {
                setErrors([error.response.data.error]);
            } else {
                setErrors(["Ocurrió un error inesperado."]);
            }
        }
    };

    return (
        <div className="min-h-screen bg-gray-100 py-10">
            <div className="max-w-xl mx-auto px-4">
                <div className="bg-white shadow-lg rounded-lg p-8">
                    <h1 className="text-2xl font-bold text-gray-800 mb-6">➕ Agregar País</h1>

                    {errors.length > 0 && (
                        <div className="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                            <strong className="block font-semibold mb-2">¡Ups! Hay errores:</strong>
                            <ul className="list-disc list-inside">
                                {errors.map((error, index) => (
                                    <li key={index}>{error}</li>
                                ))}
                            </ul>
                        </div>
                    )}

                    {successMessage && (
                        <div className="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                            {successMessage}
                        </div>
                    )}

                    <form onSubmit={handleSubmit} className="space-y-5">
                        <div>
                            <label htmlFor="country_id" className="block text-sm font-medium text-gray-700">Código del País (ID)</label>
                            <input
                                type="text"
                                name="country_id"
                                value={form.country_id}
                                onChange={handleChange}
                                maxLength="2"
                                required
                                className="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                        </div>

                        <div>
                            <label htmlFor="country_name" className="block text-sm font-medium text-gray-700">Nombre del País</label>
                            <input
                                type="text"
                                name="country_name"
                                value={form.country_name}
                                onChange={handleChange}
                                maxLength="100"
                                required
                                className="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                        </div>

                        <div>
                            <label htmlFor="phone_code" className="block text-sm font-medium text-gray-700">Código Telefónico</label>
                            <input
                                type="text"
                                name="phone_code"
                                value={form.phone_code}
                                onChange={handleChange}
                                maxLength="5"
                                className="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                        </div>

                        <div className="flex items-center">
                            <input
                                id="is_active"
                                type="checkbox"
                                name="is_active"
                                checked={form.is_active}
                                onChange={handleChange}
                                className="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                            />
                            <label htmlFor="is_active" className="ml-2 block text-sm text-gray-700">¿Activo?</label>
                        </div>

                        <div className="flex justify-end gap-4 pt-4">
                            <a href="/countries" className="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition">
                                Cancelar
                            </a>
                            <button type="submit" className="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    );
}

export default CreatePaises;

if (document.getElementById("CreatePaises")) {
    ReactDOM.render(<CreatePaises />, document.getElementById("CreatePaises"));
}
