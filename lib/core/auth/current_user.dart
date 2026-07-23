class CurrentUser {
  CurrentUser._();

  static final CurrentUser instance = CurrentUser._();

  int? id;

  String? eyId;

  String? username;

  String? phone;

  String? avatar;

  String? role;

  String? vipLevel;

  String? token;

  bool phoneVerified = false;

  List<String> permissions = [];

  bool get isLoggedIn => token != null;

  bool get isSuperAdmin => role == "SUPER_ADMIN";

  bool get isAdmin => role == "ADMIN";

  bool get isModerator => role == "MODERATOR";

  bool get isAgencyOwner => role == "AGENCY_OWNER";

  bool get isHost => role == "HOST";

  bool get isUser => role == "USER";

  bool can(String permission) {
    return permissions.contains(permission);
  }

  void clear() {
    id = null;
    eyId = null;
    username = null;
    phone = null;
    avatar = null;
    role = null;
    vipLevel = null;
    token = null;
    phoneVerified = false;
    permissions.clear();
  }

  void fromJson(Map<String, dynamic> json) {
    id = json["id"];

    eyId = json["ey_id"];

    username = json["username"];

    phone = json["phone"];

    avatar = json["avatar"];

    role = json["role"];

    vipLevel = json["vip_level"];

    phoneVerified = json["phone_verified"] ?? false;

    permissions = List<String>.from(
      json["permissions"] ?? [],
    );
  }
}
