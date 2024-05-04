import React from 'react';
import '../../css/Input.css'

function Input(text, type, classNameInput, classNameLabel) {
    return (
        <label className={classNameLabel}>
            <input type={type} className={classNameInput}></input>
            {text}
        </label>
    );
}

export default Input
