import React from 'react'

export function Input({text, type, className}) {
    return (
        <>
           <label className='Label'>
           {text}
            <input type={type} className={className}></input>
            </label>     
        </>   
    )
}
