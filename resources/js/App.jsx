import React from 'react';
import ReactDOM from 'react-dom/client'
import Sidebar from './components/Sidebar'
import RegisterView from '../views/RegisterView';

function App() {
    return (
        <div className='App'>
            <RegisterView/>
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