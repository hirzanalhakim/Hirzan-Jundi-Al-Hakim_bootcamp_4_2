import { Component, OnInit, Input } from '@angular/core';
import { DataService } from '../data.service';

@Component({
  selector: 'app-course-list',
  templateUrl: './course-list.component.html',
  styleUrls: ['./course-list.component.css']
})
export class CourseListComponent implements OnInit {

  courseList:object[];

  constructor(private data:DataService) { }

  ngOnInit() {
    this.courseList = this.data.getCourseList();
  }

  newCourse : string = "";
  newTeacher : string = "";

  addCourse(){
    let id = this.courseList.length + 1;
    this.data.addCourseList({'id_course' : id, 'course_name': this.newCourse, 'teacher_name':this.newTeacher});
  }

}
