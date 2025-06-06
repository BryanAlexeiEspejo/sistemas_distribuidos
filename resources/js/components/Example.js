import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import axios from "axios";

function Example() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Esto es un ejejmplo de componente react.js</div>

                        <div className="card-body"></div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('ejemploid')) {
    ReactDOM.render(<Example />, document.getElementById('ejemploid'));
}
