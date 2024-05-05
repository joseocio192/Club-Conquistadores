import React from 'react'
import '../../css/ComboBox.css'

export function ComboBox({text, classNameLabel ,classNameCombo}) {
    return (
        <div className='LayoutCombo'>
           <label className={classNameLabel}>
           {text}
            </label>  
            <select
                className={classNameCombo}>
            </select>
        </div>   
    )
}