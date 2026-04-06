import AddStudent from "./components/AddStudent";
import ViewStudents from "./components/ViewStudents";
import "./App.css";

function App() {
  return (
    <div className="container">
      <h1>Student Portfolio</h1>
      <AddStudent />
      <ViewStudents />
    </div>
  );
}

export default App;