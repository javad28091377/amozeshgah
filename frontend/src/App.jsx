// مدیریت کلی برنامه (پیج ها و کامپوننت ها)

import { BrowserRouter, Routes, Route } from "react-router-dom";
import Home from "./pages/Home";
import About from "./pages/About";


function App() {
  return (
    <BrowserRouter>

      {/* مدیریت مسیرهای فرانت  */}
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/about" element={<About />} />
      </Routes>

    </BrowserRouter>
  );
  
}

export default App
