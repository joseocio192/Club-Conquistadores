import React from 'react'
import '../../css/Input.css'

export function Input({text, type,classNameLabel ,classNameInput, pattern, placeholder}) {
    return (
        <div className='LayoutInput'>
           <label className={classNameLabel}>
           {text}
            </label>  
            <input 
            type={type} 
            className={classNameInput}
            pattern={pattern}
            placeholder={placeholder}>
            </input>
        </div>   
    )
}
