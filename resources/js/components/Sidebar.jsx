import React from 'react';
import ReactDOM from 'react-dom/client'

function Sidebar() {
    return (
        <div>
           jijija
        </div>
    );
}

export default Sidebar

if (document.getElementById('root')) {
    const Index = ReactDOM.createRoot(document.getElementById("root"));

    Index.render(
        <React.StrictMode>
            <Sidebar/>
        </React.StrictMode>
    )
}
