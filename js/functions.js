function deleteCourse(rowNumber) {
        window.location.replace("../../../../../../../php/model/deleteCourse.php?id="+rowNumber);
}

function courseEdit(rowNumber = -1) {
        window.location.replace("../../../../../../../php/controller/CourseEdit.php?id="+rowNumber);
}

function deleteQCM(filename) {
        window.location.replace("../../../../../../../php/model/deleteQcm.php?file="+filename);
}

function editQCM(filename = '-1') {
        window.location.replace("../../../../../../../php/controller/qcmEdit.php?file="+filename);
}

function subCourse(rowNumber = -1) {
        window.location.replace("../../../../../../../php/model/courseSub.php?id="+rowNumber);
}

function unsubCourse(rowNumber = -1) {
        window.location.replace("../../../../../../../php/model/courseUnsub.php?id="+rowNumber);
}

function unsetAdmin(rowNumber) {
        window.location.replace("../../../../../../../php/model/toggleAdmin.php?id="+rowNumber+"&admin=0");
}

function setAdmin(rowNumber) {
        window.location.replace("../../../../../../../php/model/toggleAdmin.php?id="+rowNumber+"&admin=1");
}

function delAccount(rowNumber) {
        window.location.replace("../../../../../../../php/model/deleteAccount.php?id="+rowNumber);
}