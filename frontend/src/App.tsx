import './App.css'
import { Routes, Route } from 'react-router-dom';
import {Home} from './sites/Home/Home';
import {Subject} from './sites/Subject/Subject';
function App() {
  return (
    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/subject/:id" element={<Subject />} />
      {/* <Route path="/products" element={<Products />} />
      <Route path="/about" element={<About />} /> */}
    </Routes>
  )
}

export default App
