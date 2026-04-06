const express = require("express");
const router = express.Router();
const Student = require("../models/Student");

// ADD
router.post("/add", async (req, res) => {
  const student = new Student(req.body);
  await student.save();
  res.send("Student Added");
});

// VIEW
router.get("/view", async (req, res) => {
  const students = await Student.find();
  res.json(students);
});

module.exports = router;