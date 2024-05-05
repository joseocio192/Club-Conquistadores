import React from 'react'
import { Input } from '../js/components/Input';
import { ComboBoxSexo } from '../js/components/ComboBox';
import "../css/RegisterView.css"

function RegisterView() {
    return (
        <div className='Register'>
            <div className='RegisterLeft'>
                <div className='LayoutCandidateTitle'>
                    Datos del joven aspirante
                </div>
                <div className='LayoutCandidateInputs1'>
                    <Input text='Nombre' 
                    classNameLabel='Label'
                    classNameInput='Input'/>

                    <Input text='Apellidos' 
                    classNameLabel='Label'
                    classNameInput='Input'/>

                    <Input text='E-mail' 
                    classNameLabel='Label'
                    classNameInput='Input'/>

                    <Input text='Contraseña' 
                    type='password'
                    classNameLabel='Label'
                    classNameInput='Input'/>

                    <Input text='Fecha de nacimiento'
                    type='date'
                    classNameLabel='Label'
                    classNameInput='InputDate'/>

                    <Input text='Telefono'
                    type='tel'
                    classNameLabel='Label'
                    classNameInput='Input'
                    placeholder='667-231-8212'/>

                    <Input text='Colonia'
                    classNameLabel='Label'
                    classNameInput='Input'/>
                </div>
                <div className='LayoutCandidateInputs2'>
                    <Input text='Calle'
                    classNameLabel='Label' 
                    classNameInput='InputNumber'/>

                    <Input text='Número'
                    classNameLabel='Label' 
                    classNameInput='InputNumber'/>

                    <Input text='Codigo postal'
                    classNameLabel='Label' 
                    classNameInput='InputCP'
                    placeholder='#4477'/>

                    <ComboBoxSexo> 
                        <option value="value1">Value 1</option>
                    </ComboBoxSexo>
                </div>
            </div>
            <div className='RegisterRight'>
            </div>
        </div>
    );
}

export default RegisterView
