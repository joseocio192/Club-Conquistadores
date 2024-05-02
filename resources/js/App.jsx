import React from 'react';
import ReactDOM from 'react-dom/client'
import Sidebar from './components/Sidebar'

function App() {
    return (
        <div className='App'>
            <Sidebar></Sidebar>
        </div>
    );
}

export default App

if (document.getElementById('root')) {
    const Index = ReactDOM.createRoot(document.getElementById("root"));

    Index.render(
        <React.StrictMode>
            <App/>
        </React.StrictMode>
    )
}