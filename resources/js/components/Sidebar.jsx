import React from 'react';
import ReactDOM from 'react-dom/client'
import { SidebarData } from './SidebarData';

function Sidebar() {
    return (
        <div className='Sidebar'>
            <ul className='SidebarList'>
                {SidebarData.map((val, key) => {
                    return (
                        <li key={key}
                            className='row' 
                            onClick={() => {window.location.pathname = val.link}}> 
                            <div>{val.icon}</div>
                            <div>{val.title}</div> 
                        </li>
                    )
                })}
            </ul>
        </div>
    );
}

export default Sidebar
