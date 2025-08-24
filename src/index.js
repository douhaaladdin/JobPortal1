import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';

const root = ReactDOM.createRoot(document.getElementById('root'));

// عرض المكون الرئيسي App في عنصر الـ HTML الذي يحمل id='root'
root.render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);
