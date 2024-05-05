import React from 'react'
import '../../css/Input.css'

export function Input({text, type,classNameLabel ,classNameInput}) {
    return (
        <div className='LayoutInput'>
           <label className={classNameLabel}>
           {text}
            </label>  
            <input 
            type={type} 
            className={classNameInput}>
            </input>
        </div>   
    )
}
