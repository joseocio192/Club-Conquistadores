import React from 'react'
import '../../css/ComboBox.css'

export function ComboBoxSexo() {
    return (
        <div className='LayoutCombo'>
           <label className='Label'>
           Sexo
            </label>  
            <select className='Combo'>
                <option value="masculino">Masculino</option>
                <option value="femenino" selected>Femenino</option>
            </select>
        </div>   
    )
}