import { useEffect, useState } from "react";
import axios from "axios";

function ViewStudents() {
  const [students, setStudents] = useState([]);

  const fetchStudents = () => {
    axios
      .get("http://localhost:3000/student/view")
      .then((res) => setStudents(res.data));
  };

  useEffect(() => {
    fetchStudents();
  }, []);

  return (
    <div>
      <h2>Student List</h2>
      <button onClick={fetchStudents}>Refresh</button>

      <ul>
        {students.map((s) => (
          <li key={s._id}>
            <strong>{s.name}</strong>
            <br />
            {s.email}
            <br />
            {s.course}
          </li>
        ))}
      </ul>
    </div>
  );
}

export default ViewStudents;