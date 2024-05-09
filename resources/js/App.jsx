import React from 'react';
import ReactDOM from 'react-dom/client'
//import Sidebar from './components/Sidebar'
//import RegisterView from './RegisterView'
import Index from './Index'

function App() {
    return (
        <div className='App'>
            <Index/>
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
