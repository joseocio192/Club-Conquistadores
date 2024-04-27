import React from 'react';
import ReactDOM from 'react-dom/client'

function App() {
    return (
        <div>
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