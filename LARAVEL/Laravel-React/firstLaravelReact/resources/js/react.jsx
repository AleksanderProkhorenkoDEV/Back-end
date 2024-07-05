// resources/js/Codea.jsx
import React from 'react';
import { createRoot } from 'react-dom/client'

export default function Codea(){
    return(
        <div>First App with react & laravel</div>
    );
}

if(document.getElementById('first')){
    createRoot(document.getElementById('first')).render(<Codea/>)
}
