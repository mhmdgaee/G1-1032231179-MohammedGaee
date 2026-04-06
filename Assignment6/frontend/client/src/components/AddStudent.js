import { useState } from "react";
import axios from "axios";

function AddStudent() {
  const [student, setStudent] = useState({
    name: "",
    email: "",
    course: ""
  });

  const handleChange = (e) => {
    setStudent({ ...student, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    await axios.post("http://localhost:3000/student/add", student);
    alert("Student Added");

    // clear form
    setStudent({
      name: "",
      email: "",
      course: ""
    });
  };

  return (
    <div>
      <h2>Add Student</h2>
      <form onSubmit={handleSubmit}>
        <input
          name="name"
          placeholder="Name"
          value={student.name}
          onChange={handleChange}
          required
        />

        <input
          name="email"
          placeholder="Email"
          value={student.email}
          onChange={handleChange}
          required
        />

        <input
          name="course"
          placeholder="Course"
          value={student.course}
          onChange={handleChange}
          required
        />

        <button type="submit">Add Student</button>
      </form>
    </div>
  );
}

export default AddStudent;