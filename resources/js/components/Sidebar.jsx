import React from 'react';
import { SidebarDataInstructores } from './SidebarData';
import "../../css/Sidebar.css"

function Sidebar() {
    return (
        <div className='Sidebar'>
            <span className='SidebarTitle'>Instructores</span>
            <ul className='SidebarList'>
                {SidebarDataInstructores.map((val, key) => {
                    return (
                        <li key={key}
                            className='row' 
                            onClick={() => {window.location.pathname = val.link}}> 
                            <div className='icon'>{val.icon}</div>
                            <div className='title'>{val.title}</div> 
                        </li>
                    )
                })}
                <button className='btnSalir'>Salir</button>
            </ul>
        </div>
    );
}

export default Sidebar
