import React from 'react';
//import "../../css/Sidebar.css"

function Input(text, type, className) {
    return (
        <label>
            <input type={type} className={className}></input>
            {text}
        </label>
    );
}

export default Input
